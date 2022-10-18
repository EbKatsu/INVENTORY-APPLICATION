@extends('template.layout-admin')
@section('judul','Profile')
@section('header','../sb-admin/img/Logo.png')
@section('content')

<center>
   
            <!-- Profile Image -->
      <br>    
                    <img class="profile-user-img img-responsive img-circle" src="../assets/upload/images/<?= $_SESSION['image'] ?>" style="width:125px; height:125px; border-radius:20%">

                    <h3 class="profile-username text-center"> </h3>

                    <p class="text-muted text-center">

                    </p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item" style="text-align:center">
                            <b>Username</b><br><a><?= $_SESSION['username'] ?></a>
                        </li>
                        <li class="list-group-item" style="text-align:center">
                            <b>NIPP</b><br><a><?= $_SESSION['NIPP'] ?></a>
                        </li>
                        <li class="list-group-item" style="text-align:center">
                            <b>Jabatan</b><br><a><?= $_SESSION['jabatan'] ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</center>



@endsection