<script>
import { router } from '@inertiajs/vue3';

export default function Follow(id){
    router.post(`/Profiles/${id}/follow`,   {preserveScroll:true} );
}

</script>
