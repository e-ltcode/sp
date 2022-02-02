@extends('layouts.header')
@section('content')
{{-- @dd($attempts); --}}


{{-- <style type="text/css">
  /* table {
    width: 100%;
    border-collapse: collapse;
    margin: 50px auto;
  } */

  .btn-outline-info {
    border-color: #9d43ac !important;
    color: #9d43ac !important;
  }

  .btn-outline-info:hover {
    color: #fff !important;
  }

  /* Zebra striping */
  tr:nth-of-type(odd) {
    background: #eee;
  }

  th {
    background: #9d43ac;
    color: white;
    font-weight: bold;
  }

  td,
  th {
    /* padding: 10px; */
    border: 1px solid #ccc;
    text-align: left;
    font-size: 18px;
  }

  .btn-outline-info:hover {
    background-color: #9d43ac;
    border-color: #9d43ac !important;
  }
</style> --}}
<style>
  table {
    border: 1px solid #ccc;
    border-collapse: collapse;
    margin: 0;
    padding: 0;
    width: 100%;
    table-layout: fixed;
  }

  table caption {
    font-size: 1.5em;
    margin: .5em 0 .75em;
  }

  table tr {
    background-color: #f8f8f8;
    border: 1px solid #ddd;
    padding: .35em;
  }

  table th,
  table td {
    padding: .625em;
    text-align: center;
  }

  table th {
    padding: 18px;
    font-size: .85em;
    letter-spacing: .1em;
    text-transform: capitalize;
  }

  th {
    background: #9d43ac;
    color: white;
    font-weight: bold;
  }

  td,
  th {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: left;
    font-size: 19px;
  }

  .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
  }

  .text-center {
    text-align: center !important;
  }

  h2 {
    color: #1a0e0e;
    font-size: 26px;
    font-weight: 700;
    margin: 0;
    line-height: normal;
    text-transform: uppercase;
  }

  .btn-outline-info {
    border-color: #9d43ac !important;
    color: #9d43ac !important;
  }

  table th {
    font-size: 15px;

  }

  .btn-outline-info:hover {
    color: #fff !important;
  }

  .btn-outline-info:hover {
    background-color: #9d43ac;
    border-color: #9d43ac !important;
  }

  tr:nth-child(odd) {
    background-color: #e2dfdf;
  }

  @media screen and (max-width: 600px) {
    table {
      border: 0;
    }

    .button-1 {
      text-align: right !important;
    }


    table caption {
      font-size: 1.3em;
    }

    table thead {
      border: none;
      clip: rect(0 0 0 0);
      height: 1px;
      margin: -1px;
      overflow: hidden;
      padding: 0;
      position: absolute;
      width: 1px;
    }

    table tr {
      border-bottom: 3px solid #ddd;
      display: block;
      margin-bottom: .625em;
    }

    table td {
      border-bottom: 1px solid #ddd;
      display: block;
      font-size: .8em;
      text-align: right;
    }

    table td::before {
      /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
      content: attr(data-label);
      float: left;
      font-weight: bold;
      text-transform: capitalize;
    }

    table td:last-child {
      border-bottom: 0;
    }
  }

  /* general styling */
  body {
    font-family: "Open Sans", sans-serif;
    line-height: 1.25;
  }
</style>


<div class="container px-5 mt-5 pt-3 text-right" style="">
  <h2 class="text-center my-5 text-capitalize">RESULT OF ALL QUIZ ATTEMPTS
  </h2>
  <table>
    <thead>
      <tr>
        <th>Attempt Id</th>
        <th>Quiz Title</th>
        <th>Result</th>
        <th>Percentage</th>
        <th>View Answers</th>
      </tr>
    </thead>
    <tbody>
      @if(!empty($attempts))
      @foreach($attempts as $key => $val)
      @if($val['total_questions']>0)
      @php($result = ceil($val['correct_questions']/$val['total_questions']*100))
      @else
      @php($result = 0)
      @endif
      <tr>
        <td data-label="Attempt Id">{{ $val['id'] }}</td>
        <td data-label="Quiz Title">{{ $val['quiz']['quiz_title'] }}</td>
        <td data-label="Result">{{ $val['correct_questions'].'/'.$val['total_questions'] }}</td>
        <td data-label="Percentage">{{ $result }}%</td>
        <td data-label="View Answers" class="text-center button-1"><a href="{{ url('view_quiz').'/'.$val['quiz_id'] }}"
            class="btn btn-sm btn-outline-info">View Answers</a></td>
      </tr>
      @endforeach
      @else
      <tr>
        No data Found
      </tr>
      @endif

    </tbody>
  </table>

  <a href="{{ url('') }}" class="btn btn-outline-info btn-sm mt-3 mb-2 ">Back Home</a>
</div>

@endsection