<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // TODO: 프로필과 작품 목록은 추후 DB로 이전
        $profile = [
            'name'    => 'cykim',
            'role'    => 'Web Developer',
            'bio'     => '만들고, 다듬고, 진열합니다. 여기는 제가 만든 것들을 모아둔 작은 전시대입니다.',
            'initial' => 'C',
            'links'   => [
                ['label' => 'GitHub', 'url' => 'https://github.com/coldzero7362'],
            ],
        ];

        $works = [
            ['title' => '포트폴리오 전시대', 'summary' => '지금 보고 계신 이 사이트. CodeIgniter 4와 Docker로 구성했습니다.', 'tags' => ['CodeIgniter 4', 'Docker'], 'year' => 2026],
            ['title' => '작품 제목 2', 'summary' => '한두 줄로 작품을 소개하는 자리입니다.', 'tags' => ['PHP', 'MariaDB'], 'year' => 2026],
            ['title' => '작품 제목 3', 'summary' => '한두 줄로 작품을 소개하는 자리입니다.', 'tags' => ['JavaScript'], 'year' => 2025],
            ['title' => '작품 제목 4', 'summary' => '한두 줄로 작품을 소개하는 자리입니다.', 'tags' => ['Design'], 'year' => 2025],
            ['title' => '작품 제목 5', 'summary' => '한두 줄로 작품을 소개하는 자리입니다.', 'tags' => ['Infra'], 'year' => 2025],
            ['title' => '작품 제목 6', 'summary' => '한두 줄로 작품을 소개하는 자리입니다.', 'tags' => ['Etc'], 'year' => 2024],
        ];

        return view('home', [
            'title'   => $profile['name'],
            'profile' => $profile,
            'works'   => $works,
        ]);
    }
}
