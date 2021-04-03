<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    </head>
    <body class="antialiased">
    
            <li><a href="{{ url('/ru') }}" ><i class="fa fa-language"></i> Ru</a></li>

            <li><a href="{{ url('/kz') }}" ><i class="fa fa-language"></i> KZ</a></li>

            <div>
            <!-- Here it is call variable where translates -->
                <h1>{{ __("page.welcome") }}</h1>
            </div>

            
<div class="container">

<div class="d-flex bd-highlight mb-4">
    <div class="p-2 w-100 bd-highlight">
        <h2>Laravel AJAX Example</h2>
    </div>
    <div class="p-2 flex-shrink-0 bd-highlight">
        <button class="btn btn-success" id="btn-add">
            Add Todo
        </button>
    </div>
</div>

<div>
    <table class="table table-inverse">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody id="todos-list" name="todos-list">
            @foreach ($todo as $data)
                <tr id="todo{{$data->id}}">
                    <td>{{$data->id}}</td>
                    <td>{{$data->title}}</td>
                    <td>{{$data->description}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="formModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="formModalLabel">Create Todo</h4>
                </div>
                <div class="modal-body">
                    <form id="myForm" name="myForm" class="form-horizontal" novalidate="">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter title" value="">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Enter Description" value="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                    </button>
                    <input type="hidden" id="todo_id" name="todo_id" value="0">
                </div>
            </div>
        </div>
    </div>

</div>
</div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script>
            jQuery(document).ready(function($){

                jQuery('#btn-add').click(function () {
                    jQuery('#btn-save').val("add");
                    jQuery('#myForm').trigger("reset");
                    jQuery('#formModal').modal('show');
                });

                $("#btn-save").click(function (e) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    e.preventDefault();
                    var formData = {
                        title: jQuery('#title').val(),
                        description: jQuery('#description').val(),
                    };
                    var state = jQuery('#btn-save').val();
                    var type = "POST";
                    var todo_id = jQuery('#todo_id').val();
                    var ajaxurl = 'todo';
                    $.ajax({
                        type: type,
                        url: ajaxurl,
                        data: formData,
                        dataType: 'json',
                        success: function (data) {
                            var todo = '<tr id="todo' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.description + '</td>';

                            $('#todos-list').append(todo);
                            
                            jQuery('#myForm').trigger("reset");
                            jQuery('#formModal').modal('hide')
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
