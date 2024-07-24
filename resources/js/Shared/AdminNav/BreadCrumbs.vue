<template>
    <nav class="flex mt-2 text-white" aria-label="Breadcrumb">
        
                <Link href="/dashboard" class="inline-flex items-center text-sm font-medium  hover:text-gray-500 ">
                    Dashboard
                </Link>
                        <a href="#" class="ml-1 text-sm font-medium hover:text-gray-300 md:ml-2 flex items-center">
                            
                           - {{pageName}}
                        </a>
               
        
    </nav>
</template>

<script>

export default {
    props: {
        pageName : {
            required: true,
            type: String
        }
    }
}

</script>
