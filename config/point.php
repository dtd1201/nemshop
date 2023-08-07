<?php
    return [
        'typePoint' => [
            1 => [
                'type' => 1,
                'name' => 'Điểm thưởng M',
                // mặc định 100
            ],
            2 => [
                'type' => 2,
                'name' => 'Điểm thưởng chiết khấu',
                // số phằn trăm giá trị đơn hàng khi các con mua
                // 20 lớp
            ],
            3 =>  [
                'type' => 3,
                'name' => 'Điểm thưởng tiêu dùng',
                // điểm cộng từ sơ đồ 7 lớp
            ],
            4 =>  [
                'type' => 4,
                'name' => 'Nạp từ thành viên',
            ],
            5 =>  [
                'type' => 5,
                'name' => 'Rút điểm',
            ],
            6 =>  [
                'type' => 6,
                'name' => 'Mua sản phẩm',
            ],
            7 =>  [
                'type' => 7,
                'name' => 'Hoàn điểm',
            ],
            8 =>  [
                'type' => 8,
                'name' => 'Điểm thưởng từ admin',
            ],

            9 =>  [
                'type' => 9,
                'name' => 'Hoa hồng đội nhóm',
            ],
            10 =>  [
                'type' => 10,
                'name' => 'Điểm thưởng tự bán',
            ],
            11 =>  [
                'type' => 11,
                'name' => 'Điểm thưởng doanh số GĐ',
            ],
            12 =>  [
                'type' => 12,
                'name' => 'Điểm thưởng thụ động',
            ],
            13 =>  [
                'type' => 13,
                'name' => 'Điểm trừ từ admin',
            ],

            'defaultPoint' => 100,
            'pointReward' => 1,
            'pointStart' => 12,
            'pointStartNhaThuoc' => 20,
        ],
        'rose' => [
            1 => [
                'row' => 1,
                'percent' => 3,
            ],
            /*2 => [
                'row' => 2,
                'percent' => 5,
            ],
            3 => [
                'row' => 3,
                'percent' => 3,
            ],
            4 => [
                'row' => 4,
                'percent' => 2,
            ],
            5 => [
                'row' => 5,
                'percent' => 1,
            ],
            6 => [
                'row' => 6,
                'percent' => 1,
            ],
            7 => [
                'row' => 7,
                'percent' => 1,
            ],
            8 => [
                'row' => 8,
                'percent' => 0.5,
            ],
            9 => [
                'row' => 9,
                'percent' => 0.5,
            ],
            10 => [
                'row' => 11,
                'percent' => 0.5,
            ],
            11 => [
                'row' => 11,
                'percent' => 0.5,
            ],
            12 => [
                'row' => 12,
                'percent' => 0.5,
            ],
            13 => [
                'row' => 13,
                'percent' => 0.5,
            ],
            14 => [
                'row' => 14,
                'percent' => 0.5,
            ],
            15 => [
                'row' => 15,
                'percent' => 0.5,
            ],
            16 => [
                'row' => 16,
                'percent' => 0.3,
            ],
            17 => [
                'row' => 17,
                'percent' => 0.3,
            ],
            18 => [
                'row' => 18,
                'percent' => 0.3,
            ],
            19 => [
                'row' => 19,
                'percent' => 0.3,
            ],
            20 => [
                'row' => 20,
                'percent' => 0.3,
            ],*/
        ],

        // trạng thái pay
        'typePay' => [
            1 => [
                'type' => 1,
                'name' => 'Đang chờ xử lý',

            ],
            2 => [
                'type' => 2,
                'name' => 'Đã rút thành công',
            ],
            3 =>  [
                'type' => 3,
                'name' => 'Rút không thành công',
            ],
        ],
        'typePhieuXuat' => [
            1 => [
                'type' => 1,
                'name' => 'Xuất cho đơn hàng',

            ],
            2 => [
                'type' => 2,
                'name' => 'Xuất cho đại lý',
            ],
            3 =>  [
                'type' => 3,
                'name' => 'Xuất để tặng',
            ],
        ],
        'typeStore' => [
            1 => [
                'type' => 1,
                'name' => 'Nhập kho',
            ],
            2 => [
                'type' => 2,
                'name' => 'Đã đặt hàng đang chờ xuất kho',
            ],
            3 =>  [
                'type' => 3,
                'name' => 'Xuất kho',
            ],
        ],
        'typeUser' => [
            1 => [
                'type' => 1,
                'name' => 'Tồng giám đốc',
                'point' => 3,
            ],
            2 => [
                'type' => 2,
                'name' => 'Giám đốc',
                'point' => 5,
            ],
            3 =>  [
                'type' => 3,
                'name' => 'Trình dược viên',
                'point' => 15,
            ],
            4 =>  [
                'type' => 4,
                'name' => 'Nhà thuốc',
                'point' => 20,
            ],
        ],
        'daiLy' => [
            1 => [
                'value' => 0,
                'name' => 'Chưa là đại lý',
            ],
            2 => [
                'value' => 1,
                'name' => 'Đại lý cấp 4',
            ],
            3 =>  [
                'value' => 2,
                'name' => 'Đại lý cấp 3',
            ],
            4 =>  [
                'value' => 3,
                'name' => 'Đại lý cấp 2',
            ],
            5 =>  [
                'value' => 4,
                'name' => 'Đại lý cấp 1',
            ],
            6 =>  [
                'value' => 5,
                'name' => 'Giám đốc',
            ],
        ],
        // thời gian mở cổng rút điểm
        'datePay'=>[
            'start'=>1,
            'end'=>30
        ],
        // số điểm bắn mắc định
        'transferPointDefault'=>1,
        // đơn vị của điểm
        'pointUnit'=>'Điểm',
        'pointToMoney'=>1000,
        'namePointDefault'=>"Phạm Văn Hưng",
    ];
?>
