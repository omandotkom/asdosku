@extends('layouts.maillayout')
@section('title','Aktifiasi Pembayaran')
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
                        <p>Terimakasih Atas Pemesanan Anda</p>
                        <p>Pesanan telah selesai dikerjakan silahkan membayar seharga <br>	
                        	Rp {{ number_format($transaction->biaya, 2) }}
                        	
                        </p>
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>
                              <td align="left">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td> 
                                      	<a href="{{route('indexdosen')}}">Klik Untuk Melakukan Pembayaran</a>
                                      	
                                        </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
@endsection