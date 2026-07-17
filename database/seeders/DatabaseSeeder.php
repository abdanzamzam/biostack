<?php

namespace Database\Seeders;

use App\Models\Theme;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Default themes
        Theme::create([
            'name' => 'Ocean',
            'slug' => 'ocean',
            'is_premium' => false,
            'preview_image' => null,
            'config' => [
                'fonts' => ['heading' => 'Inter', 'body' => 'Inter'],
                'css_vars' => [
                    '--bg-start' => '#0f766e',
                    '--bg-end' => '#0d9488',
                    '--card-bg' => 'rgba(255,255,255,0.1)',
                    '--card-border' => 'rgba(255,255,255,0.2)',
                    '--text' => '#ffffff',
                    '--text-muted' => '#ccfbf1',
                    '--accent' => '#2dd4bf',
                ],
                'avatar' => 'circle',
                'alignment' => 'center',
                'card_style' => 'glass',
                'card_radius' => 'rounded-2xl',
            ],
        ]);

        Theme::create([
            'name' => 'Midnight',
            'slug' => 'midnight',
            'is_premium' => false,
            'preview_image' => null,
            'config' => [
                'fonts' => ['heading' => 'Inter', 'body' => 'Inter'],
                'css_vars' => [
                    '--bg-start' => '#0f172a',
                    '--bg-end' => '#1e293b',
                    '--card-bg' => 'rgba(255,255,255,0.05)',
                    '--card-border' => 'rgba(255,255,255,0.1)',
                    '--text' => '#f1f5f9',
                    '--text-muted' => '#94a3b8',
                    '--accent' => '#6366f1',
                ],
                'avatar' => 'rounded',
                'alignment' => 'center',
                'card_style' => 'minimal',
                'card_radius' => 'rounded-xl',
            ],
        ]);

        Theme::create([
            'name' => 'Minimal',
            'slug' => 'minimal',
            'is_premium' => false,
            'preview_image' => null,
            'config' => [
                'fonts' => ['heading' => 'Inter', 'body' => 'Inter'],
                'css_vars' => [
                    '--bg-start' => '#ffffff',
                    '--bg-end' => '#f8fafc',
                    '--card-bg' => '#ffffff',
                    '--card-border' => '#e2e8f0',
                    '--text' => '#0f172a',
                    '--text-muted' => '#64748b',
                    '--accent' => '#0d9488',
                ],
                'avatar' => 'circle',
                'alignment' => 'center',
                'card_style' => 'shadow',
                'card_radius' => 'rounded-xl',
            ],
        ]);

        Theme::create([
            'name' => 'Sunset',
            'slug' => 'sunset',
            'is_premium' => true,
            'preview_image' => null,
            'config' => [
                'fonts' => ['heading' => 'Inter', 'body' => 'Inter'],
                'css_vars' => [
                    '--bg-start' => '#f43f5e',
                    '--bg-end' => '#fb923c',
                    '--card-bg' => 'rgba(255,255,255,0.15)',
                    '--card-border' => 'rgba(255,255,255,0.25)',
                    '--text' => '#ffffff',
                    '--text-muted' => '#fecdd3',
                    '--accent' => '#fbbf24',
                ],
                'avatar' => 'circle',
                'alignment' => 'center',
                'card_style' => 'glass',
                'card_radius' => 'rounded-2xl',
            ],
        ]);

        Theme::create([
            'name' => 'Retro',
            'slug' => 'retro',
            'is_premium' => true,
            'preview_image' => null,
            'config' => [
                'fonts' => ['heading' => 'Playfair Display', 'body' => 'Lora'],
                'css_vars' => [
                    '--bg-start' => '#fef3c7',
                    '--bg-end' => '#fffbeb',
                    '--card-bg' => '#ffffff',
                    '--card-border' => '#fde68a',
                    '--text' => '#78350f',
                    '--text-muted' => '#92400e',
                    '--accent' => '#d97706',
                ],
                'avatar' => 'circle',
                'alignment' => 'center',
                'card_style' => 'border',
                'card_radius' => 'rounded-lg',
            ],
        ]);

        // Demo user
        $user = User::create([
            'name' => 'Demo User',
            'email' => 'demo@biostack.test',
            'password' => bcrypt('password'),
            'username' => 'demo',
            'theme_id' => 1,
            'page_title' => 'Demo User',
            'page_bio' => 'Full-stack developer & open source enthusiast. Building cool stuff with Laravel & React.',
            'bg_type' => 'gradient',
            'bg_value' => ['#0f766e', '#0d9488'],
        ]);

        $user->links()->createMany([
            ['type' => 'link', 'title' => 'My Portfolio', 'url' => 'https://example.com', 'icon' => 'globe', 'sort_order' => 0],
            ['type' => 'link', 'title' => 'GitHub', 'url' => 'https://github.com', 'icon' => 'github', 'sort_order' => 1],
            ['type' => 'link', 'title' => 'Latest Blog Post', 'url' => 'https://example.com/blog', 'icon' => 'book-open', 'sort_order' => 2],
            ['type' => 'divider', 'title' => '—', 'sort_order' => 3],
            ['type' => 'social', 'title' => 'Twitter / X', 'url' => 'https://x.com', 'icon' => 'twitter', 'sort_order' => 4],
            ['type' => 'social', 'title' => 'Instagram', 'url' => 'https://instagram.com', 'icon' => 'instagram', 'sort_order' => 5],
            ['type' => 'social', 'title' => 'LinkedIn', 'url' => 'https://linkedin.com', 'icon' => 'linkedin', 'sort_order' => 6],
            ['type' => 'text', 'title' => 'Tip: Double tap to like ❤️', 'sort_order' => 7],
        ]);
    }
}
