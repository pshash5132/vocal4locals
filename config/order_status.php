<?php

return [
    'order_status_admin' => [
        'pending'=>[
            'status'=>'pending',
            'details'=>'Your status is currently pending'
        ],
        'processed_and_ready_to_ship'=>[
            'status'=>'Processed and ready to ship',
            'details'=>'Your package has been processed and will be with our delivery partner soon'
        ],
        'dropped_off'=>[
            'status'=>'Dropped Off',
            'details'=>'Your package has been dropped of by seller'
        ],
        'shipped'=>[
            'status'=>'Shipped',
            'details'=>'Your package has arrived at our logistics facility'
        ],
        'out_of_delivery'=>[
            'status'=>'Out for delivery',
            'details'=>'Our delivery partner will attempt to delivery your package'
        ],
        'delivered'=>[
            'status'=>'Delivered',
            'details'=>'Delivered'
        ],
        'cancelled'=>[
            'status'=>'Cancelled',
            'details'=>'Cancelled'
        ],
    ],
    'order_status_vendor' => [
        'pending'=>[
            'status'=>'pending',
            'details'=>'Your status is currently pending'
        ],
        'processed_and_ready_to_ship'=>[
            'status'=>'Processed and ready to ship',
            'details'=>'Your package has been processed and will be with our delivery partner soon'
        ],

    ]
]
?>
