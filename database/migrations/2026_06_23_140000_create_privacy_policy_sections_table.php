<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('privacy_policy_sections', function (Blueprint $table) {
            $table->id(); $table->string('title'); $table->string('slug')->unique(); $table->string('subtitle')->nullable();
            $table->string('icon_class')->default('bi bi-shield-check'); $table->longText('content'); $table->boolean('status')->default(true); $table->integer('sort_order')->default(0); $table->timestamps();
        });
        $now = now();
        $sections = [
            ['Overview and Scope','overview','Scope and purpose','bi bi-file-text','This Privacy Policy applies to information collected through the website and direct interactions initiated from it, including enquiry forms, calls and WhatsApp messages.'],
            ['Information Collected','collection','Data you may provide','bi bi-person-vcard','We may collect contact information, enquiry details, business information and limited technical information that you voluntarily provide or that is generated while using the website.'],
            ['How We Use Data','usage','Purposes of processing','bi bi-gear-wide-connected','Information is used to respond to enquiries, share requested product or business information, manage communications, improve the website and meet legal obligations.'],
            ['Cookies & Analytics','cookies','Website technologies','bi bi-cookie','The website may use cookies or similar technologies for essential functionality, performance analysis and improving visitor experience.'],
            ['Sharing & Disclosure','sharing','When data may be shared','bi bi-share','Personal information is not sold. It may be shared only with service providers, relevant support partners or authorities where reasonably necessary or legally required.'],
            ['Security & Retention','security','Protection and storage','bi bi-shield-lock','Reasonable administrative and technical safeguards are used to protect information. Information is retained only for as long as reasonably needed.'],
            ['Your Rights','rights','Access and requests','bi bi-person-check','Subject to applicable law, you may request access, correction or deletion of information associated with you, or opt out of non-essential communication.'],
            ['Contact & Updates','contact','Questions and policy changes','bi bi-chat-dots','Contact us with privacy questions or requests. This policy may be updated periodically, and the latest version will be published on this page.'],
        ];
        foreach ($sections as $index => [$title,$slug,$subtitle,$icon,$content]) DB::table('privacy_policy_sections')->insert(['title'=>$title,'slug'=>$slug,'subtitle'=>$subtitle,'icon_class'=>$icon,'content'=>$content,'status'=>true,'sort_order'=>$index+1,'created_at'=>$now,'updated_at'=>$now]);
    }
    public function down(): void { Schema::dropIfExists('privacy_policy_sections'); }
};
