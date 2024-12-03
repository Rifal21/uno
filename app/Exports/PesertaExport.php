<?php

namespace App\Exports;

use App\Models\Daftar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PesertaExport implements FromCollection, WithHeadings, WithColumnFormatting, WithColumnWidths, WithDrawings, WithStyles
{
    protected $filters;
    protected $dataWithImages;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Daftar::query();

        // Filter berdasarkan search term
        if (!empty($this->filters['search'])) {
            $query->where(function ($query) {
                $query->where('nama', 'like', '%' . $this->filters['search'] . '%')
                    ->orWhere('NIK', 'like', '%' . $this->filters['search'] . '%')
                    ->orWhere('kontingen', 'like', '%' . $this->filters['search'] . '%');
            });
        }

        // Filter lainnya
        if (!empty($this->filters['kelas'])) {
            $query->whereHas('kelas', function ($subQuery) {
                $subQuery->where('nama_kelas', $this->filters['kelas']);
            });
        }

        if (!empty($this->filters['tingkat'])) {
            $query->whereHas('kelas', function ($subQuery) {
                $subQuery->where('tingkat', $this->filters['tingkat']);
            });
        }

        if (!empty($this->filters['kategori'])) {
            $query->whereHas('kategori', function ($subQuery) {
                $subQuery->where('nama', $this->filters['kategori']);
            });
        }

        if (!empty($this->filters['kontingen'])) {
            $query->where('kontingen', 'like', '%' . $this->filters['kontingen'] . '%');
        }

        $query->with(['kelas', 'kategori']);

        $this->dataWithImages = $query->get();

        return $this->dataWithImages->map(function ($peserta) {
            return [
                'nama' => $peserta->nama,
                'noKK' => $peserta->noKK,
                'NIK' => $peserta->NIK,
                'kelas' => $peserta->kelas ? $peserta->kelas->nama_kelas : 'Tidak ada kelas',
                'tingkat' => $peserta->kelas ? $peserta->kelas->tingkat : 'Tidak ada tingkat',
                'kategori' => $peserta->kategori ? $peserta->kategori->nama : 'Tidak ada kategori',
                'gender' => $peserta->gender,
                'berat_badan' => $peserta->berat_badan === 0 ? '-' : $peserta->berat_badan . ' Kg',
                'kontingen' => $peserta->kontingen,
                'nama_pelatih' => $peserta->nama_pelatih,
                'email' => $peserta->email,
                'nohp' => $peserta->nohp,
                'status' => $peserta->status === 0 ? 'Belum diverifikasi' : 'Terverifikasi',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Nomor Kartu Keluarga',
            'NIK',
            'Kelas',
            'Tingkat',
            'Kategori',
            'Jenis Kelamin',
            'Berat Badan',
            'Kontingen',
            'Nama Pelatih',
            'E-mail',
            'No Hp / Whatsapp',
            'Status',
            'Bukti Pembayaran',
            'Pas Foto',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER,
            'C' => NumberFormat::FORMAT_NUMBER,
            'L' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 25,
            'C' => 20,
            'D' => 20,
            'E' => 20,
            'F' => 20,
            'G' => 20,
            'H' => 15,
            'I' => 20,
            'J' => 25,
            'K' => 20,
            'L' => 20,
            'M' => 20,
            'N' => 30,
            'O' => 30,
        ];
    }

    public function drawings()
    {
        $drawings = [];
        $row = 2;
    
        foreach ($this->dataWithImages as $peserta) {
            if (!empty($peserta->bukti_pembayaran)) {
                $drawing = new Drawing();
                $drawing->setName('Bukti Pembayaran');
                $drawing->setDescription('Bukti Pembayaran');
                $drawing->setPath(storage_path('app/public/' . $peserta->bukti_pembayaran));
                $drawing->setHeight(90);
                $drawing->setCoordinates('N' . $row);
                $drawing->setOffsetX(80); // Menengahkan gambar secara horizontal
                $drawing->setOffsetY(15); // Menengahkan gambar secara vertikal
                $drawings[] = $drawing;
            }
    
            if (!empty($peserta->foto)) {
                $drawing = new Drawing();
                $drawing->setName('Pas Foto');
                $drawing->setDescription('Pas Foto');
                $drawing->setPath(storage_path('app/public/' . $peserta->foto));
                $drawing->setHeight(90);
                $drawing->setCoordinates('O' . $row);
                $drawing->setOffsetX(60);
                $drawing->setOffsetY(15);
                $drawings[] = $drawing;
            }
    
            $row++;
        }
    
        return $drawings;
    }
    

    public function styles(Worksheet $sheet)
    {
        $count = $this->dataWithImages->count() + 1;
    
        $sheet->getStyle('A1:O' . $count)
            ->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ]);
    
        // Atur tinggi baris sesuai gambar
        foreach (range(2, $count) as $row) {
            $sheet->getRowDimension($row)->setRowHeight(90);
        }
    
        return [];
    }
    
}
