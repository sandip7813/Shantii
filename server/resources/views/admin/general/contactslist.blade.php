@extends('layouts.admin')

@section('title')
    Contacts
@endsection

@section('content')
    
    <div class="module">
        <div class="module-head">
            <h3>Contacts</h3>
        </div>
        <div class="module-body">
            
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($contactsArr as $key => $contactVal)
                        <tr>
                            <td>{{$contactVal->full_name}}</td>
                            <td>{{$contactVal->phone}}</td>
                            <td>{{$contactVal->email_id}}</td>
                            <td>{{$contactVal->subject}}</td>
                            <td>{{$contactVal->message}}</td>
                            <td>{{$contactVal->created_at}}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            
        </div>
    </div>

    <br />

@endsection


