$(document).ready(function(){
    $("#{{$dssvotro}}").on("show.bs.modal", function(event){

    $(this).find(".modal-body").load("{{ route('DSSVotro',['gid' => $nhatro->gid])}}");
});
});
