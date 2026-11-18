# display
포트폴리오 전시를 위한 전시대

## 구조

GitHub Pages + Jekyll. `main` 브랜치가 https://coldzero7362.github.io/portfolio_display/ 로 배포된다.

| 파일 | 내용 |
|---|---|
| `_data/profile.yml` | 프로필 카드 (이름, 픽셀 로고 글자, 명령줄, 소개, 링크) |
| `_data/works.yml` | 진열장 작품 목록 |
| `assets/img/profile.jpg` | 프로필 사진 (없으면 이니셜 표시) |
| `_includes/wordmark.html` | 픽셀 로고 SVG 생성 (글리프: `_data/glyphs.yml`) |
| `DESIGN.md` | UI 디자인 기준 |

## 로컬 미리보기

```bash
docker compose up -d    # http://<서버IP>:8001
```
