@extends('layouts.header')
@section('content')
{{-- @dd($attempts); --}}


<style type="text/css">
/*.footer-section {
    margin-top: 100px;
    position: absolute;
    width: 100%;
    bottom: 0px;
}*/
  table { 
    width: 100%; 
    border-collapse: collapse; 
    margin:50px auto;
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

  td, th { 
    padding: 10px; 
    border: 1px solid #ccc; 
    text-align: left; 
    font-size: 18px;
  }
  .btn-outline-info:hover{
    background-color: #9d43ac;
    border-color: #9d43ac !important;
  }

/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

  table { 
    width: 100%; 
  }

  /* Force table to not be like tables anymore */
  table, thead, tbody, th, td, tr { 
    display: block; 
  }
  
  /* Hide table headers (but not display: none;, for accessibility) */
  thead tr { 
    position: absolute;
    top: -9999px;
    left: -9999px;
  }
  
  tr { border: 1px solid #ccc; }
  
  td { 
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee; 
    position: relative;
    padding-left: 50%; 
  }

  td:before { 
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%; 
    padding-right: 10px; 
    white-space: nowrap;
    /* Label the data */
    content: attr(data-column);

    color: #000;
    font-weight: bold;
  }

}

</style>


<div class="container mt-5 pt-5 text-right" style="min-height: 400px;">

      <h2 class="text-center">Result of All Quiz Attempt</h2>
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
        <td data-column="Attempt Id">{{ $val['id'] }}</td>
        <td data-column="Quiz Title">{{ $val['quiz']['quiz_title'] }}</td>
        <td data-column="Result">{{ $val['correct_questions'].'/'.$val['total_questions'] }}</td>
        <td data-column="Percentage">{{ $result }}%</td>
        <td data-column="Percentage" class="text-center"><a href="{{ url('view_quiz').'/'.$val['quiz_id'] }}" class="btn btn-sm btn-outline-info">View Answers</a></td>
      </tr>
      @endforeach 
      @else
      <script type="text/javascript">
        // alert('No Data Found')
      </script>
      <tr>
        No data Found
      </tr>
      @endif 
    </tbody>

  </table>

  <a href="{{ url('') }}" class="btn btn-outline-info">Back Home</a>
 
</div>

@endsection