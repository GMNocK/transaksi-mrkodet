@extends('dashboard.layouts.main')

@section('container')
<div class="table-responsive">
    <table class="table table-hover table-email">
        <tbody>
        <tr class="unread selected">
            <td>
                <div class="ckbox ckbox-theme">
                    <input id="checkbox1" type="checkbox" checked="checked" class="mail-checkbox">
                    <label for="checkbox1"></label>
                </div>
            </td>
            <td>
                <a href="#" class="star star-checked"><i class="fa fa-star"></i></a>
            </td>
            <td>
                <div class="media">
                    <div class="media-body">
                        <h4 class="text-primary">{{ $ }}</h4>
                        <p class="email-summary"><strong>Commits pushed</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit... <span class="label label-success">New</span> </p>
                        <span class="media-meta">Today at 6:16am</span>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div><!-- /.table-responsive -->
@endsection