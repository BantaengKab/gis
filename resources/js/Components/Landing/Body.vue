<template>
    <div
        class="relative sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center bg-white dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div class="max-w-7xl p-6 lg:p-8">
            <div class="mt-0 sm:mt-16">
                <div class="mt-0 sm:mt-16"><slot /></div>
            </div>
        </div>
    </div>
</template>
