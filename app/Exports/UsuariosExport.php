<?php

namespace App\Exports;

use App\Usuario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class UsuariosExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Usuario::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'NOMBRE',
            'AP. PATERNO',
            'AP. MATERNO',
            'GENERO',
            'CORREO ELECTRÓNICO',
            'RFC',
            'TELÉFONO',
            'FACEBOOK',
            'TWITTER',
            'NUM. PERSONAL',
            'DELEGACIÓN',
            'ZONA ESCOLAR',
            'CLAVE C.T.',
            'CONFIRMACIÓN',
            'CODIGO DE CONFIRMACIÓN',
            'CREADO',
            'ACTUALIZADO'        
        ];
    }

    
 
    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:R1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
            },
        ];
    }    

}
