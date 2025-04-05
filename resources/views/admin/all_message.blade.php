<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')


    <style type="text/css">
        .table-deg{
            border: 2px solid white;
            margin: auto;
            width: 80%; 
            text-align: center;
            margin-top: 40px;
        }
        .th-deg{
            background-color: skyblue;
            padding: 15px; 
        }
    
        tr{
          border: 3px solid white;
        }
        td{
          padding: 10px ;
        }
        </style>



  </head>
  <body>
    @include('admin.header')
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <table class="table-deg">
                <tr>
                    <th class="th-deg">Name</th>
                    <th class="th-deg">Email</th>
                    <th class="th-deg">Phone</th>
                    <th class="th-deg">Message</th>
                    <th class="th-deg">Send Email</th>
                </tr>
                
                @foreach ($data as $data)
                    

                <tr>

                    <td>{{$data->name}}</td> 
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->message}}</td>
                    <td>
                        <a class="btn btn-success" href="{{url('send_mail',$data->id)}}">send mail</a>
                    </td>

                </tr>
                @endforeach

 
            </table>


           </div>
        </div>
    </div>

      @include('admin.footer')
  </body>
</html> 