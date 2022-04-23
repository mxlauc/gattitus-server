<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    protected $photos = [
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d21669a_ea739f6b-b46a-4292-87ed-05a38e9a409d%2Flg.jpg?alt=media&token=b1229779-a617-4f5e-b188-1edde2882252',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d2195c3_880ad0ac-18d1-4ec2-976c-2fcb6ef46687%2Flg.jpg?alt=media&token=59702741-2b93-4f6c-94f0-8ba44e4addf7',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d21c46b_2ca4e5cb-cae8-4d84-a131-f76e5ae0a68a%2Flg.jpg?alt=media&token=bf7f645e-fb0c-48b8-8eb2-c725ec36873e',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d21f0a5_9fe4bf60-f301-4fef-8c81-96d0a2d0e0c8%2Flg.jpg?alt=media&token=bfc78286-5ed0-4b04-bb52-d12a45073a4c',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d221d26_49108c4a-9792-497f-bf30-cc163d16672c%2Flg.jpg?alt=media&token=908ef1fa-8473-47f1-88b8-c331d2473009',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d224785_826d2bfb-e8f9-4588-9809-c3337cf5251a%2Flg.jpg?alt=media&token=9f8d03ce-5be7-4472-bba2-007bd8189504',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d227914_83708209-50b6-4916-98a9-62c99b299bbe%2Flg.jpg?alt=media&token=becd53e1-7f32-469c-950d-e32a470f9f86',
    ];

    protected $photos_cats = [
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F18053aaa684_3daa6a85-0e09-4d0b-a34d-51d4a38ab5fc%2Flg.jpg?alt=media&token=54099d25-e73a-4243-ba85-c62fd312764f',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F18053aad4c9_31df1620-31c7-4d5d-bc01-7d89a7a9877d%2Flg.jpg?alt=media&token=e2ae2c92-9a1c-4d8c-9da0-07d61a901dca',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F18053ab1808_e96b3948-44f6-45ba-b216-ff18f0eaec15%2Flg.jpg?alt=media&token=94fdb2d5-ff4c-480d-8a2a-1bb0889de9c2',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F18053abcb91_93182d6e-7618-4023-8d3f-0b8471749290%2Flg.jpg?alt=media&token=74407f03-96a4-4e72-87a3-ecbf737c1405',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F18053ac191a_d2c4250a-c67f-4e3e-9ca4-461511766600%2Flg.jpg?alt=media&token=b667191e-4b88-4b78-8301-fee1a804ca41',
    ];

    protected $images = [
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F180345bea26_d121ddd2-e00a-44d1-9c8a-279882dc5083%2Flg.jpg?alt=media&token=a8a7548f-e613-4b24-804b-6495933dd8d6',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d24e264_8097c0a2-fc0f-4a1a-bd6d-571e78d63d13%2Flg.jpg?alt=media&token=1b51599f-c831-4023-bc4b-86efe981fa45',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d2502b5_545ec7e5-1be1-4e13-9165-98559e773a91%2Flg.jpg?alt=media&token=1673cdce-1366-4bb4-b8f4-445afed14b63',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d252134_8832c1be-d2d9-4cb5-bad3-0f79c88de3c3%2Flg.jpg?alt=media&token=dc0c4ab9-1b3f-40ea-aa6e-ffdaef9af3b4',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d254973_8040edfc-126e-408d-8c19-beeb2be477d9%2Flg.jpg?alt=media&token=0a704f3f-969b-48ef-bae1-957ba4538435',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d258f50_a01ccccd-acce-4825-9113-ca1198ce93a9%2Flg.jpg?alt=media&token=d9484ab0-c2d4-4714-abe4-9719ae850476',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d25c490_0105507b-d799-420a-b3d9-2a0fbb8af0e9%2Flg.jpg?alt=media&token=10a50064-16b7-4ec6-ab0e-80b95ba3a9d2',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d25fa85_837b94b6-cf20-4568-a9b9-7b0cdb1d980e%2Flg.jpg?alt=media&token=fc63c5e8-2e12-4b81-8341-f7431477b9df',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d262a0b_8f24a9ac-313e-48c3-a661-02fe4fc68baa%2Flg.jpg?alt=media&token=8de895f8-2874-484d-a2e4-c33cda6fe9b0',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d265bfb_e5f3b1e5-a65e-4404-9508-724cb4717295%2Flg.jpg?alt=media&token=615486e4-cf62-4a48-9241-a8768e7239d4',
        'https://firebasestorage.googleapis.com/v0/b/proyectoxdxd-6a713.appspot.com/o/gattitus%2F2484623438347919%2Fimgs%2F1804d2699d7_05c27b67-4bb5-4a0d-bafb-e0eee198046f%2Flg.jpg?alt=media&token=b7a91d2e-fb88-45e4-b501-c9a6c6b2d74c',
    ];

    protected $aspects = [
        '{"aspect_ratio":1.5,"color_bl":"#6af6ff","color_tr":"#36e8ff"}',
        '{"aspect_ratio":0.7,"color_bl":"#ffffff","color_tr":"#c4c8cd"}',
        '{"aspect_ratio":0.7,"color_bl":"#847d68","color_tr":"#c9bfa4"}',
        '{"aspect_ratio":0.8,"color_bl":"#b2a2a4","color_tr":"#9f948a"}',
        '{"aspect_ratio":0.8,"color_bl":"#db5750","color_tr":"#b9ab90"}',
        '{"aspect_ratio":0.6,"color_bl":"#c9ccc8","color_tr":"#7d7270"}',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url_xs' => $this->faker->randomElement($this->images),
            'directory' => 'directorio/de/imagen',
            'meta_data' => $this->aspects[array_rand($this->aspects)],
            'user_id' => null,
        ];
    }

    public function is_photo(){
        return $this->state(function (array $attributes) {
            return [
                'url_xs' => $this->faker->randomElement($this->photos),
            ];
        });
    }

    public function is_photo_cat(){
        return $this->state(function (array $attributes) {
            return [
                'url_xs' => $this->faker->randomElement($this->photos_cats),
            ];
        });
    }

     /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Image $image) {
            //
        })->afterCreating(function (Image $image) {
            $image->url_sm = $image->url_xs;
            $image->url_md = $image->url_xs;
            $image->url_lg = $image->url_xs;
            $image->url_xl = $image->url_xs;
            $image->save();
        });
    }
}
