
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel-body pt-5">
        <h1>New Homework</h1>
        <!-- Display Validation Errors -->
        @include('common.errors')

        <form action="/homework" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="homework-subject" class="col-sm-3 control-label">Subject</label>
                <div class="col-sm-6">
                    <select name="subject" id="homework-subject" class="form-control">
                    @foreach ($subjects as $subjects_item)
                      <option value="{{ $subjects_item->subjectname }}">{{ $subjects_item->subjectname }}</option>
                    @endforeach
                    </select>
                </div>

            </div>

            <div class="form-group">
                <label for="homework-task" class="col-sm-3 control-label">Homework</label>

                <div class="col-sm-6">
                    <input type="text" name="task" id="homework-task" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="homework-date" class="col-sm-3 control-label">Date</label>

                <div class="col-sm-6">
                    <input type="date" name="date" id="homework-date" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i>&nbsp;Add Homework
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if (count($homework) > 0)

            <div class="panel-body pt-5">
                <h1>Current Homework</h1>
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Homework</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Options</th>
                    </thead>

                    <tbody>
                        @foreach ($homework as $homework_item)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $homework_item->task }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $homework_item->subject }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $homework_item->date}}</div>
                                </td>

                                <td>
                                    <form action="/homework/{{ $homework_item->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i>&nbsp;Löschen</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    @endif
</div>

@endsection
