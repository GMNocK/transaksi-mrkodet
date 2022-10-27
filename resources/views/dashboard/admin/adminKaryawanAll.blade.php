@extends('dashboard.layouts.main')

@section('container')
<div class="table-responsive ms-5 col-9">
    <table class="table table-hover table-email">
        <tbody>
            @foreach ($laporankaryawans as $i)

            <tr class="unread selected">
                <td>
                    <div class="media">
                        <div class="media-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="text-primary">{{ $i->karyawan->nama }}</h4>
                                <span class="me-5" style="font-size: 14px">{{ $i->send_at }}</span>
                            </div>
                            <h6><strong>{{ $i->title }}</strong></h6>
                            <p class="email-summary"> {{ $i->excerpt }} </p>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div><!-- /.table-responsive -->
@endsection