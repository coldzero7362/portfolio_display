<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        helper('wordmark');

        // TODO: 프로필과 작품 목록은 추후 DB로 이전
        $profile = [
            'name'     => 'cykim',
            'wordmark' => 'Small_Golem', // 프로필 카드 픽셀 로고 글자
            // 프로필 카드 명령줄 (cmd = 왼쪽 명령어, value = [ ] 안 값). 줄 수 자유
            'prompt'  => [
                ['cmd' => 'whoami',   'value' => 'Web Developer'],
                ['cmd' => 'stack',    'value' => 'PHP · CodeIgniter 4 · Docker'],
                ['cmd' => 'status',   'value' => '새로운 것을 만드는 중'],
            ],
            'bio'     => '만들고, 다듬고, 진열합니다. 여기는 제가 만든 것들을 모아둔 작은 전시대입니다.',
            'initial' => 'C',
            'image'   => 'assets/img/profile.jpg', // public/ 기준. 파일이 없으면 이니셜 표시
            'links'   => [
                ['label' => 'GitHub', 'url' => 'https://github.com/coldzero7362'],
            ],
        ];

        if (! is_file(FCPATH . $profile['image'])) {
            $profile['image'] = null;
        }

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
