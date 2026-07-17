<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->nullable()->after('email');
            $table->string('custom_domain')->unique()->nullable()->after('username');
            $table->timestamp('custom_domain_verified_at')->nullable()->after('custom_domain');
            $table->foreignId('theme_id')->nullable()->constrained()->nullOnDelete()->after('custom_domain_verified_at');
            $table->string('page_title')->nullable()->after('theme_id');
            $table->text('page_bio')->nullable()->after('page_title');
            $table->string('page_avatar')->nullable()->after('page_bio');
            $table->string('bg_type')->default('gradient')->after('page_avatar');
            $table->json('bg_value')->nullable()->after('bg_type');
            $table->string('seo_title')->nullable()->after('bg_value');
            $table->text('seo_description')->nullable()->after('seo_title');
            $table->string('og_image')->nullable()->after('seo_description');
            $table->string('plan')->default('free')->after('og_image');
            $table->boolean('is_active')->default(true)->after('plan');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username', 'custom_domain', 'custom_domain_verified_at',
                'theme_id', 'page_title', 'page_bio', 'page_avatar',
                'bg_type', 'bg_value', 'seo_title', 'seo_description',
                'og_image', 'plan', 'is_active'
            ]);
        });
    }
};
