<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $user->seo_title ?? $user->page_title ?? $user->name }}</title>
    <meta name="description" content="{{ $user->seo_description ?? $user->page_bio ?? "" }}">
    @if($user->og_image)
    <meta property="og:image" content="{{ Storage::url($user->og_image) }}">
    @endif
    <meta property="og:title" content="{{ $user->page_title ?? $user->name }}">
    <meta property="og:description" content="{{ $user->page_bio ?? "" }}">
    <meta name="theme-color" content="{{ ($theme->config["css_vars"]["--bg-start"] ?? "#0f766e") }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            @foreach(($theme->config["css_vars"] ?? []) as $key => $val)
                {{ $key }}: {{ $val }};
            @endforeach
            --card-radius: {{ $theme->config["card_radius"] ?? "16px" }};
            --card-style: {{ $theme->config["card_style"] ?? "glass" }};
            --avatar-shape: {{ $theme->config["avatar"] ?? "circle" }};
        }
        body {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, var(--bg-start), var(--bg-end));
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 48px 16px;
            -webkit-font-smoothing: antialiased;
        }
        .container {
            width: 100%;
            max-width: 420px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .avatar {
            width: 96px;
            height: 96px;
            object-fit: cover;
            margin: 0 auto;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .avatar-circle { border-radius: 50%; }
        .avatar-rounded { border-radius: 16px; }
        .avatar-square { border-radius: 8px; }
        .header { text-align: center; }
        .header h1 {
            font-size: 24px;
            font-weight: 700;
            font-family: "Inter", sans-serif;
        }
        .header p {
            font-size: 14px;
            margin-top: 8px;
            opacity: 0.8;
            line-height: 1.5;
        }
        .card {
            display: block;
            width: 100%;
            padding: 14px 24px;
            text-align: center;
            font-weight: 500;
            font-size: 15px;
            color: var(--text);
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .card:hover {
            transform: scale(1.02);
            filter: brightness(1.1);
        }
        .card-glass {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: var(--card-radius);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .card-shadow {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: var(--card-radius);
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .card-border {
            background: var(--card-bg);
            border: 2px solid var(--card-border);
            border-radius: var(--card-radius);
        }
        .card-minimal {
            background: transparent;
            border: none;
            border-radius: var(--card-radius);
        }
        .divider {
            border: none;
            border-top: 1px solid var(--card-border);
            margin: 8px 0;
            opacity: 0.5;
        }
        .text-block {
            text-align: center;
            font-size: 14px;
            opacity: 0.7;
            padding: 8px 0;
            line-height: 1.5;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            opacity: 0.4;
            margin-top: 32px;
        }
        .image-link img {
            width: 100%;
            border-radius: var(--card-radius);
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        @if($user->page_avatar)
        <img src="{{ Storage::url($user->page_avatar) }}"
             alt="Avatar"
             class="avatar avatar-{{ $theme->config["avatar"] ?? "circle" }}"
             style="box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
        @endif

        <div class="header">
            <h1>{{ $user->page_title ?? $user->name }}</h1>
            @if($user->page_bio)
            <p>{{ $user->page_bio }}</p>
            @endif
        </div>

        <div style="display: flex; flex-direction: column; gap: 12px;">
            @foreach($links as $link)
                @if($link->type === "divider")
                    <hr class="divider">
                @elseif($link->type === "text")
                    <p class="text-block">{{ $link->title }}</p>
                @elseif($link->type === "image" && $link->image)
                    <a href="{{ $link->url }}" target="_blank" class="image-link">
                        <img src="{{ Storage::url($link->image) }}" alt="{{ $link->title }}">
                    </a>
                @else
                    <a href="{{ $link->url }}"
                       target="_blank"
                       data-link-id="{{ $link->id }}"
                       class="track-click card card-{{ $theme->config["card_style"] ?? "glass" }}">
                        {{ $link->title }}
                    </a>
                @endif
            @endforeach
        </div>

        <p class="footer">Built with BioStack</p>
    </div>

    <script>
        document.querySelectorAll(".track-click").forEach(function(el) {
            el.addEventListener("click", function() {
                var id = this.dataset.linkId;
                if (id) { navigator.sendBeacon("/api/click/" + id); }
            });
        });
    </script>
</body>
</html>