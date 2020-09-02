@extends('layouts.maillayout')
@section('title','Pesan')
@section('content')
  <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                      	<a href="{{route('home')}}"><img src="https://i.ibb.co/GRBNXqV/Asdosku-logo.png" alt="Asdosku logo" border="0"></a>
                      	<hr>
                      	<br>
                        <p>Hay <b>{{$data['email']}}</b></p>
                        <p>{{$data['message']}}
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
@endsection