<?php
// *******************  rule group *******************
$config = [
    'add_rules' => [
        [
            'field' => 'blog_title',
            'label' => 'Blog Title',
            'rules' => 'required|min_length[3]|max_length[50]'
        ],
        [
            'field' => 'blog_content',
            'label' => 'Blog Area',
            'rules' => 'required|min_length[8]'
        ]
    ]
];
