@php($sl=1)

@foreach($subcategory as $s)

 <tr align="center">
   <td>{{ $sl++ }}</td>
   <td>{{ $s->category_name }}</td>
   <td>{{ $s->sub_category }}</td>
   <td>
     @if($s->status=='1')
       <span class="badge badge-warning">Deactive</span>
     @else
       <span class="badge badge-success">Active</span>

     @endif
   </td>

   <td>
     @if($s->status=='1')
      <button onclick="active('{{ $s->id }}')" class="btn btn-success btn-sm"><i class="fa fa-arrow-alt-circle-down"></i></button>
     @else
      <button onclick="deactive('{{ $s->id }}')" class="btn btn-warning btn-sm"><i class="fa fa-arrow-alt-circle-up"></i></button>

     @endif
      <button onclick="edite('{{ $s->id }}','{{ $s->category_id }}','{{ $s->sub_category }}')" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
      <button onclick="dele('{{ $s->id }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
   </td>
 </tr>

@endforeach