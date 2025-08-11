<script>

import { computed } from 'vue';


export function formatDate(datestr){
    const date=new Date(datestr)
           return new Intl.DateTimeFormat('en-Us', {
            month:'long',
            day:'numeric',
             year:'numeric'
           }).format(date)
}

</script>
