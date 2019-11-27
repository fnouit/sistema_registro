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
        // return Usuario::all();
        return Usuario::select (
            'usuarios.id as NO',
            'usuarios.codigo_confirmacion as FOLIO',
            'usuarios.nombre as NOMBRE',
            'usuarios.apellido_p as A_PATERNO',
            'usuarios.apellido_m as A_MATERNO',
            'usuarios.genero as GENERO',
            'usuarios.correo as CORREO',
            'usuarios.rfc as RFC',
            'usuarios.telefono as TELEFONO',
            'usuarios.num_personal as NUM_PERSONAL',
            'usuarios.zona_e as ZONA_E',
            'usuarios.clave_ct as CT',
            'nomenclaturas.nomenclatura as NOMENCLATURA',
            'delegacions.numero as NUMERO',
            'delegacions.sede as SEDE',
            'usuarios.delegacion_opc as DELEG',
            'regions.nombre as REGION_NOMBRE',
            'regions.sede as REGION_SEDE')
            ->join('delegacions' , 'usuarios.delegacion_id', '=', 'delegacions.id')
            ->join('nomenclaturas', 'delegacions.nomenclatura_id', '=', 'nomenclaturas.id')
            ->join('regions', 'delegacions.region_id', '=', 'regions.id')
            ->get();
    
    }

    public function headings(): array
    {
        return [
            'NO',
            'FOLIO',
            'NOMBRE',
            'A_PATERNO',
            'A_MATERNO',
            'GENERO',
            'CORREO',
            'RFC',
            'TELEFONO',
            'NUM_PERSONAL',
            'ZONA_E',
            'CT',
            'NOMENCLATURA',
            'NUMERO',
            'SEDE',
            'DELEG',
            'REGION_NOMBRE',
            'REGION_SEDE'        
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
