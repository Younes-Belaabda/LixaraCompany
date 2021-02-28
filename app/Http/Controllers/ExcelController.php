<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Box;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Excel;
use Auth;

class InvoicesExport implements FromArray,WithHeadings,WithColumnWidths,WithStyles
{
    protected $invoices;

    public function __construct(array $invoices)
    {
        $this->invoices = $invoices;
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);

    }
    public function columnWidths(): array
    {
        return [
            'A' => 9,
            'B' => 9,
            'C' => 28,
            'D' => 19,
            'E' => 14,
            'F' => 14,
            'G' => 14,
            'H' => 10,
            'I' => 10,
            'J' => 10,            
            'k' => 25,            
        ];
    }
    public function headings(): array
    {
        return [
            'N°',
            'Date',
            'Part number',
            'Issue',
            'Production Date',
            'Batch Number\'s',
            'Quantity / Box' ,
            'Good Part\'s',
            'NG Part\'s',
            'Rework',
            'Technicien',

        ];
    }
    public function array(): array
    {
        return $this->invoices;
    }
}

class ExcelController extends Controller implements FromCollection
{
    public function collection()
    {
        return Box::all();
    }
    public function export() 
    {
        // return Excel::download(new InvoicesExport, 'invoices.xlsx');
        $export = new InvoicesExport([
            [1, 2, 3],
            [4, 5, 6]
        ]);
    
        return Excel::download($export, 'invoices.xlsx');
    }
    //
    public function generateExcel(Request $request) {
        $data = [
            'date' => $request->date, 
            'partnumber' => $request->partnumber,
            'issue' => $request->issue,
            'productiondate' => $request->productiondate,
            'batchnumber' => $request->batchnumber,
            'quantity' => $request->quantity,
            'goodpart' => $request->goodpart,
            'badpart' => $request->badpart,
            'rework' => $request->rework,
            'rows' => $request->row
        ];
        // Nums
        $numero = [];
        for($i = 0;$i<$data['rows'];$i++){
            $numero = [...$numero,($i+1)];
        }
        // Part Number
        $partNumbers = [];
        for($i = 0;$i<$data['rows'];$i++){
            if($i < 10){
                $newnumber = $data['partnumber'] . 0 . $i ;
            }else{
                $newnumber = $data['partnumber'] . $i;
            }
            $partNumbers = [...$partNumbers,$newnumber];
        }
        // Production Date
        $productionDates = [];
        for($i = 0;$i<$data['rows'];$i++){
            $productionDates[] = (int)$data['productiondate'] + $i;
        }
        $final = [];
        for($i = 0;$i<$data['rows'];$i++){
            $final[] = [
                $numero[$i],
                $data['date'],
                $partNumbers[$i],
                $data['issue'],
                $productionDates[$i],
                $data['batchnumber'],
                $data['quantity'],
                $data['goodpart'],
                $data['badpart'],
                $data['rework'],
                Auth::user()->name
            ];
        }
        $export = new InvoicesExport([
            // [1, 2, 3],
            // [4, 5, 6]
            $final 
        ]);
    
        return Excel::download($export, 'invoices.xlsx');
        // dd($data);
    }
}
