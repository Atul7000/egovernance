@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-primary">Student Details</h2>

    <div class="input-group mb-3">
        <input type="text" id="student_id" class="form-control" placeholder="Enter Student ID">
        <button class="btn btn-primary" onclick="fetchStudentData()">Fetch Data</button>
    </div>

    <div id="error-message" class="alert alert-danger mt-3 d-none"></div>

    <table class="table table-bordered table-striped d-none" id="student-table">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>PAN Card</th>
                <th>ID Card</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td id="student-name"></td>
                <td id="student-email"></td>
                <td id="student-mobile"></td>
                <td id="student-pan"></td>
                <td><a id="student-id-card" target="_blank" class="btn btn-sm btn-outline-primary">View</a></td>
            </tr>
        </tbody>
    </table>

    <h3 class="mt-4 text-secondary">Academic Records</h3>
    <table class="table table-bordered table-striped d-none" id="marks-table">
        <thead class="table-dark">
            <tr>
                <th>Year</th>
                <th>Standard</th>
                <th>Percentage</th>
            </tr>
        </thead>
        <tbody id="marks-body"></tbody>
    </table>
</div>

<script>
function fetchStudentData() {
    let studentId = document.getElementById('student_id').value;
    if (!studentId) {
        alert("Please enter a Student ID!");
        return;
    }

    fetch(`/api/student/${studentId}`)
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            document.getElementById('error-message').innerText = data.error;
            document.getElementById('error-message').classList.remove('d-none');
            document.getElementById('student-table').classList.add('d-none');
            document.getElementById('marks-table').classList.add('d-none');
            return;
        }

        document.getElementById('error-message').classList.add('d-none');
        document.getElementById('student-table').classList.remove('d-none');
        document.getElementById('marks-table').classList.remove('d-none');

        let student = data.data;
        document.getElementById('student-name').innerText = student.name;
        document.getElementById('student-email').innerText = student.email;
        document.getElementById('student-mobile').innerText = student.mobile_no;
        document.getElementById('student-pan').innerText = student.pan_card_no;
        document.getElementById('student-id-card').href = `/${student.id_card_path}`;

        let marksTable = document.getElementById('marks-body');
        marksTable.innerHTML = "";
        student.percentages.forEach(record => {
            let row = `<tr>
                        <td>${record.year}</td>
                        <td>${record.standard == 0 ? 'N/A' : record.standard}</td>
                        <td>${record.percentage}%</td>
                      </tr>`;
            marksTable.innerHTML += row;
        });
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endsection
