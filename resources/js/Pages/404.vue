
<template>
    <Head>
        <title>404 Error - Page Not Found</title>
        <meta type="description" content="Home description" head-key="description">
    </Head>
    <div class="w-full bg-gray-900 pb-20">
        
        <div class="container mx-auto flex justify-between pt-6 px-4 gap-8"> 
            <img src="/img/404.png" class="w-1/3 mx-auto"/>
        </div>
        <div class="container flex flex-col items-center justify-center px-5 mx-auto mb-6">
		<div class="max-w-md text-center">
			<h2 class="mb-4 font-extrabold text-9xl text-gray-400">
				<span class="sr-only">Error</span>404
			</h2>
			<p class="text-2xl font-semibold md:text-3xl text-gray-200">Sorry, we couldn't find this page.</p>
			<p class="mt-4 mb-8 text-gray-200">But dont worry, you can find plenty of other things on our homepage.</p>
			<Link  href="/" class="px-8 py-3 font-semibold rounded dark:bg-violet-400 dark:text-gray-900">Back to homepage</Link>
		</div>
	</div>
           
    </div>
</template>

<script>

export default {
    layout: null,
};
</script>
