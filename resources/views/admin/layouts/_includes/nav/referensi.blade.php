<!--NAv 2-->
<li>
                                
        <a href="{{route('manage-sewa.index')}}" class="{{Request::path()=="admin/manage-sewa"? 'is-active':''}}">
            <?php 
                
                $un_sewa=Sewa::where('status','unverified')->count();
                ?>
            <span class="count tag is-pulled-right is-dark">{{$un_sewa}}</span>
            List Sewa ( Unverified )</a>
        </li>
