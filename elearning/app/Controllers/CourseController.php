<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(): void
    {
        $courseModel = new Course();

        $this->view('courses/index', [
            'title' => 'Daftar Kelas',
            'classes' => $courseModel->all(),
        ]);
    }
}