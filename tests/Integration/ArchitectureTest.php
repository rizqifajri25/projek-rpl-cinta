<?php
it('keeps required architecture directories', function(){expect(is_dir(app_path('Services')))->toBeTrue();});
