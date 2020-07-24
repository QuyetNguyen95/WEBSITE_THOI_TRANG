<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class TransactionExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
//tạo tiêu đề trong file excel
    public function headings(): array
    {
        return [
            'Tên khách hàng',
            'Email',
            'Số điện thoại',
            'Địa chỉ',
            'Ghi chú',
            'Tổng tiền',
            'Ngày đặt hàng'
        ];
    }
//xuất dử liệu về đơn hàng về file excel
    public function collection()
    {
        $transactions = Transaction::with('user:id,name,email')->get();

        foreach ($transactions as $row) {
            $transaction[] = array(
                '0' => $row->user['name'],
                '1' => $row->user['email'],
                '2' => $row->tr_phone,
                '3' => $row->tr_address,
                '4' => $row->tr_note,
                '5' => number_format($row->tr_total,0,'','.').' đ',
                '6' => $row->created_at
            );
        }

        return (collect($transaction));
    }
}
