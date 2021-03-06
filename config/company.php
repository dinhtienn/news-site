<?php

return [
    'info' => [
        'address' => 'Hanoi, Vietnam',
        'phone' => '(+84) 969988524',
        'email' => 'dinhtiennguyen.1202@gmail.com',
        'short_description' => 'Laravel project 1 Open Education 28 at Sun*',
    ],
    'social' => [
        'instagram' => 'https://www.instagram.com/diinh.tienn/',
        'facebook' => 'https://www.facebook.com/tiennguyen122/',
        'twitter' => 'https://twitter.com/LaxusGod/',
        'pinterest' => 'https://www.pinterest.com/dinhtiennguyen1/',
        'google' => 'https://google.com/',
    ],
    'limit_posts' => [
        'latest_posts_sidebar' => 5,
        'latest_posts_homepage' => 10,
        'latest_posts_footer' => 2,
        'related_posts' => 4,
        'hot_posts' => 6,
        'popular_posts_homepage' => 6,
        'popular_posts_sidebar'  => 5,
        'latest_tags' => 8,
        'category_detail' => 12,
        'tag_detail' => 12,
    ],
    'cache_time' => [
        'latest_posts_layout' => 3600,
        'category_menu' => 3600 * 24,
        'latest_posts_homepage' => 3600,
        'hot_posts' => 3600 * 3,
        'popular_posts_homepage' => 3600 * 12,
        'pagination' => 3600 * 24,
        'popular_posts_sidebar' => 3600,
        'latest_tags' => 3600 * 12,
        'month_views' => 3600,
        'month_posts' => 3600,
        'month_salary' => 3600,
        'month_writers' => 3600 * 12,
    ],
    'count_views_cooldown_time' => 60 * 10,
    'hot_posts_views_per' => 1,
    'popular_posts_views_per' => 3,
    'feedback_route' => 'https://forms.gle/HkjAvRBw6q9rjJ8p9',
    'feedback_result' => 'https://docs.google.com/spreadsheets/d/1RpCVLQyhJEWfl8dur9YXV_lVdWI7heFgkIjm2DMfy8U/edit?usp=sharing',
    'default_post_img' => 'https://lorempixel.com/640/480/?80408',
    'default_user_avatar' => '/bower_components/skote-template-assets/assets/images/users/avatar-2.jpg',
    'request_writer' => [
        'accepted' => 1,
        'rejected' => 0,
    ],
    'category' => [
        'parent' => 0,
        'child' => 1,
    ],
    'post_status' => [
        'waiting' => 0,
        'rejected' => 1,
        'commented' => 2,
        'accepted' => 3,
    ],
    'comment' => [
        'type' => [
            'comment' => 1,
            'review' => 2,
        ],
        'status' => [
            'display' => 1,
            'hidden' => 2,
            'waiting' => 3,
            'processed' => 4,
        ]
    ],
    'status_post' => [
        0 => 'waiting',
        1 => 'rejected',
        2 => 'commented',
        3 => 'accepted',
    ],
    'category_id' => [1, 2, 3, 4, 5],
];
