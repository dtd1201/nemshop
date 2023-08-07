<?php
return [
    // admin_id la truong auto
    'category_sliders' => [
        'type' => 'tour',
        'routeNameIndex' => 'admin.categoryslider.index',
        'routeNameAdd' => 'admin.categoryslider.create',
        'routeNameStore' => 'admin.categoryslider.store',
        'routeNameEdit' => 'admin.categoryslider.edit',
        'routeNameUpdate' => 'admin.categoryslider.update',
        'routeNameDelete' => 'admin.categoryslider.destroy',
        'routeNameOrder' => 'admin.loadOrderVeryModel',
        'table' => 'category_sliders',
        'validateAdd' => 'category_sliders',
        'field' => [
            'name',
            'slug',
            'description',
            'description_seo',
            'title_seo',
            'keyword_seo',
            'content',
            'active',
            'order',
            'parent_id'
        ],
        'fieldFileSingle' => ['icon_path', 'avatar_path'],
        'fieldFileArray' => []
    ]
];
