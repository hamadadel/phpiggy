<?php include($this->resolve('partials._header')); ?>
<section class="max-w-2xl mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">

    <form method="POST" class="grid grid-cols-1 gap-6">
        <!-- Email -->
        <label class="block">
            <span class="text-gray-700">Email address</span>
            <input name="email" value="<?= e($old['email'] ?? '')  ?>" type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="john@example.com" />
            <?php
            if (array_key_exists('email', $errors)) : ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500"><?= e($errors['email'][0]) ?></div>
            <?php endif ?>
        </label>
        <!-- Age -->
        <label class="block">
            <span class="text-gray-700">Age</span>
            <input name="age" value="<?= e($old['age'] ?? '') ?>" type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" />
            <?php
            if (array_key_exists('age', $errors)) : ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500"><?= e($errors['age'][0]) ?></div>
            <?php
            endif;
            ?>
        </label>
        <!-- Country -->
        <label class="block">
            <span class="text-gray-700">Country</span>
            <select name="country" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Select Country</option>
                <option value="USA" <?= e($old['country'] === 'USA' ? 'selected' : '') ?>>USA</option>
                <option value="Canada" <?= e($old['country'] === 'Canada' ? 'selected' : '') ?>>Canada</option>
                <option value="Mexico" <?= e($old['country'] === 'Mexico' ? 'selected' : '') ?>>Mexico</option>
            </select>
            <?php
            if (array_key_exists('country', $errors)) : ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500"><?= e($errors['country'][0]) ?></div>
            <?php
            endif;
            ?>
        </label>
        <!-- Social Media URL -->
        <label class="block">
            <span class="text-gray-700">Social Media URL</span>
            <input name="socialMediaURL" value="<?= e($old['socialMediaURL'] ?? '')  ?>" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" />
            <?php
            if (array_key_exists('socialMediaURL', $errors)) : ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500"><?= e($errors['socialMediaURL'][0]) ?></div>
            <?php
            endif;
            ?>
        </label>
        <!-- Password -->
        <label class="block">
            <span class="text-gray-700">Password</span>
            <input name="password" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" />
            <?php
            if (array_key_exists('password', $errors)) : ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500"><?= e($errors['password'][0]) ?></div>
            <?php
            endif;
            ?>
        </label>
        <!-- Confirm Password -->
        <label class="block">
            <span class="text-gray-700">Confirm Password</span>
            <input name="confirmPassword" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" />
            <?php
            if (array_key_exists('confirmPassword', $errors)) : ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500"><?= e($errors['confirmPassword'][0]) ?></div>
            <?php
            endif;
            ?>
        </label>
        <!-- Terms of Service -->
        <div class="block">
            <div class="mt-2">
                <div>
                    <label class="inline-flex items-center">
                        <input name="termsOfService" <?= ($old['termsOfService'] ?? '') ? 'checked' : '' ?> class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" type="checkbox" />
                        <span class="ml-2">I accept the terms of service.</span>
                        <?php
                        if (array_key_exists('termsOfService', $errors)) : ?>
                            <div class="bg-gray-100 mt-2 p-2 text-red-500"><?= e($errors['termsOfService'][0]) ?></div>
                        <?php
                        endif;
                        ?>
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="block w-full py-2 bg-indigo-600 text-white rounded">
            Submit
        </button>
    </form>
</section>
<?php include $this->resolve('partials._footer') ?>