import { reactive } from "vue";

export default function useStore() {
    const store = reactive({
        rows: [
            {
                id: 1,
                cols: [
                    {
                        id:1,
                        type: 'CAROUSEL',
                        items: [
                            {
                                id: 1,
                                background_image: 'https://www.xtmobile.vn/vnt_upload/weblink/6-7redmi11.png',
                                primary_text: 'Image',
                                secondary_text: 'secondary_text',
                                order: 3,
                            },
                            {
                                id: 2,
                                background_image: 'https://www.xtmobile.vn/vnt_upload/weblink/27ipad-gen9.png',
                                primary_text: 'Image',
                                secondary_text: 'secondary_text',
                                order: 1
                            },
                            {
                                id: 3,
                                background_image: 'https://www.xtmobile.vn/vnt_upload/weblink/29MACBOOK-M2.png',
                                primary_text: 'Image',
                                secondary_text: 'secondary_text',
                                order: 2
                            },
                        ]
                    }
                ],
                order: 1,
            },
            {
                id: 2,
                cols: [
                    {
                        id: 1,
                        type: 'CARD',
                        background_image: 'https://www.xtmobile.vn/vnt_upload/product/08_2019/thumbs/(600x600)_crop_iphone-12-128gb-cu.jpg',
                        title: 'Cart title',
                        description: 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
                        link: 'https://www.xtmobile.vn/vnt_upload/product/08_2019/thumbs/(600x600)_crop_iphone-12-128gb-cu.jpg',
                        order: 1
                    },
                    {
                        id: 2,
                        type: 'CARD',
                        background_image: 'https://www.xtmobile.vn/vnt_upload/product/08_2020/thumbs/600_ipad_2017_32gb_9_7inch_gen_5_4g_trang.jpg',
                        title: 'Cart title',
                        description: 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
                        link: 'https://www.xtmobile.vn/vnt_upload/product/08_2019/thumbs/(600x600)_crop_iphone-12-128gb-cu.jpg',
                        order: 2
                    },
                    {
                        id: 3,
                        type: 'CARD',
                        background_image: 'https://www.xtmobile.vn/vnt_upload/product/11_2021/thumbs/600_apple_watch_series_7_45mm_gps_vien_nhom_day_cao_su_xanh_la.jpg',
                        title: 'Cart title',
                        description: 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
                        link: 'https://www.xtmobile.vn/vnt_upload/product/08_2019/thumbs/(600x600)_crop_iphone-12-128gb-cu.jpg',
                        order: 3
                    },
                    {
                        id: 4,
                        type: 'SIDEBAR',
                        items: [
                            {
                                id: 1,
                                title: 'Ốp lưng, tai nghe',
                                order: 1,
                            },
                            {
                                id: 2,
                                title: 'Pin sạc dự phòng',
                                order: 2,
                            },
                            {
                                id: 3,
                                title: 'Phụ kiện khác',
                                order: 3,
                            },
                            {
                                id: 4,
                                title: 'Phụ kiện điện thoại',
                                order: 4,
                            }
                        ]
                    }
                ],
                order: 2
            }
        ]
    });

    return {
        store
    };
}
