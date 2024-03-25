<?php

namespace Tests\Feature;

use Multiavatar;
use Tests\TestCase;

class AvatarTest extends TestCase
{
    public function test_avatar_generates_a_valid_svg_code(): void
    {
        $userId = 1;

        $multiavatar = new Multiavatar();
        $svgCode = $multiavatar->generate($userId, null, null);

        $this->assertIsString($svgCode);
        $this->assertNotEmpty($svgCode);
        $this->assertStringContainsString('<svg', $svgCode);
        $this->assertStringContainsString('</svg>', $svgCode);
    }
    public function test_avatar_generates_a_different_svg_code_for_different_users(): void
    {
        $userId1 = 1;
        $userId2 = 2;

        $multiavatar = new Multiavatar();
        $svgCode1 = $multiavatar->generate($userId1, null, null);
        $svgCode2 = $multiavatar->generate($userId2, null, null);

        $this->assertNotEquals($svgCode1, $svgCode2);
    }

}
