@extends('layout')
@section('content')
<form action="{{ route('store') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="0">
    <div class="input-group">
        <input type="text" class="form-control" name="id" placeholder="Id">
        <input type="text" class="form-control" name="admission_no" placeholder="Admission_No">
        <input type="text" class="form-control" name="name" placeholder="Name">
            <div class="my-2">
                <input class="form-check-input" type="radio" name="gender" id="male" value="1">
                <label class="form-check-label" for="male">Male</label>
                <input class="form-check-input" type="radio" name="gender" id="female" value="2">
                <label class="form-check-label" for="female">Female</label>
            </div>
                <input type="date" class="form-control" name="date_of_birth" placeholder="Date Of Birth">
                <input type="text" class="form-control" name="phone" placeholder="Phone">
                <input type="text" class="form-control" name="password" placeholder="password">
                <input type="text" class="form-control" name="address" placeholder="Address">
                <input type="text" class="form-control" name="class_id" placeholder="Class_Id">
                <input type="text" class="form-control" name="section_id" placeholder="Section_Id">
                <input type="text" class="form-control" name="parent_id" placeholder="Parent_Id">
                <input type="date" class="form-control" name="admission_date" placeholder="Admission Date">
                <input type="text" class="form-control" name="status" placeholder="Status">
    </div>
                <button class="btn btn-primary my-2" id="btn_save">Add</button>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div> 
                @endif
</form>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Admission_No</th>
            <th>Name</th>
            <th>Date_of_birth</th>
            <th>Phone</th>
            <th>password</th>
            <th>Address</th>
            <th>Class_Id</th>
            <th>Section_Id</th>
            <th>Parent_Id</th>
            <th>Admission_Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->admission_no }}
            <td>{{ $student->name }}</td>
            <td>{{ $student->date_of_birth }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->password }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->class_id }}</td>
            <td>{{ $student->section_id }}</td>
            <td>{{ $student->parent_id }}</td>
            <td>{{ $student->admission_date }}</td>
            <td>{{ $student->status }}</td>
            <td>
                <button class="btn btn-primary" edit_user_id="{{ $student->id }}"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-danger" delete_user_id="{{ $student->id }}"><i class="bi bi-trash"></i></button>
                <a href="{{ route('show',[$student->id]) }}" class="btn btn-dark"><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    <a href="{{ route('logout') }}" class="btn btn-danger mb-5">Logout</a>
</div>
<script>
$(document).on('click','[edit_user_id]',function() {
    $('#btn_save').html('Update');
    var id=$(this).attr('edit_user_id');
    $.ajax({
        url:'{{ route('fetch') }}',
        method:'get',
        data:{id:id},
        dataType:'json',
        success:function(data){
            console.log(data);
            $('[name="id"]').eq(0).val(data.id);
            $('[name="admission_no"]').eq(0).val(data.admission_no);
            $('[name="name"]').eq(0).val(data.name);
            $('[name="date_of_birth"]').eq(0).val(data.date_of_birth);
            $('[name="phone"]').eq(0).val(data.phone);
            $('[name="password"]').eq(0).val(data.password);
            $('[name="address"]').eq(0).val(data.address);
            $('[name="class_id"]').eq(0).val(data.class_id);
            $('[name="section_id"]').eq(0).val(data.section_id);
            $('[name="parent_id"]').eq(0).val(data.parent_id);
            $('[name="admission_date"]').eq(0).val(data.admission_date);
            $('[name="status"]').eq(0).val(data.status);
            $(`[name="gender"][value="${data.gender}"]`).prop('checked', true);
        }
    });
})
//For Delete
$(document).on('click','[delete_user_id]',function(){
    if(confirm('Are you sure to Delete?')){
        var id=$(this).attr('delete_user_id');
        $.ajax({
            url:'{{ route('delete') }}',
            method:'get',
            data:{id:id},
            success:function(data){
                console.log(data);
                window.location.reload();
            }
        });
    }
})
</script>
@endsection
                        
                    
