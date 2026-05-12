<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    // CRUD function
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function dashboard()
    {
        $prodiCounts = Student::select('prodi', DB::raw('count(*) as total'))
            ->groupBy('prodi')
            ->pluck('total', 'prodi');

        $angkatanCounts = Student::select('angkatan', DB::raw('count(*) as total'))
            ->groupBy('angkatan')
            ->orderBy('angkatan')
            ->pluck('total', 'angkatan');

        $graduatedCounts = Student::select('angkatan', DB::raw('count(*) as total'))
            ->where('is_graduated', true)
            ->groupBy('angkatan')
            ->orderBy('angkatan')
            ->pluck('total', 'angkatan');

        $statusCounts = Student::select(DB::raw('is_graduated as status'), DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        $statusData = [
            'Lulus' => $statusCounts->get(1, 0),
            'Belum Lulus' => $statusCounts->get(0, 0),
        ];

        return view('student.dashboard', compact('prodiCounts', 'angkatanCounts', 'graduatedCounts', 'statusData'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'prodi' => 'required|string',
            'angkatan' => 'required|integer|min:2000',
            'is_graduated' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['is_graduated'] = $request->boolean('is_graduated');

        Student::create($data);

        return redirect('/student');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'prodi' => 'required|string',
            'angkatan' => 'required|integer|min:2000',
            'is_graduated' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['is_graduated'] = $request->boolean('is_graduated');

        $student = Student::findOrFail($id);
        $student->update($data);

        return redirect('/student');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('/student');
    }

}