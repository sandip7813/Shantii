export class GlobalConstants {
    public static serverUrl: string = 'http://localhost:8000/';
    //public static serverUrl: string = 'http://shantii-server.sandipn.net/';

    public static siteTitle: string = 'Shantii';

    //+++++++++++++++++++++++++ GALLERY PICTURES PATH :: Start +++++++++++++++++++++++++//
    private static profile_pic_path: string = 'uploaded_images/';
    
    public static Img_Large_Path: string = GlobalConstants.serverUrl + GlobalConstants.profile_pic_path;

    public static Img_780_Path: string = GlobalConstants.serverUrl + GlobalConstants.profile_pic_path + 'thumb_780/';

    public static Img_200_Path: string = GlobalConstants.serverUrl + GlobalConstants.profile_pic_path + 'thumbnail/';
    //+++++++++++++++++++++++++ GALLERY PICTURES PATH :: End +++++++++++++++++++++++++//

    //+++++++++++++++++++++++++ PRODUCTS PICTURES PATH :: Start +++++++++++++++++++++++++//
    private static product_pic_path: string = 'product_images/';
    
    public static Prd_Img_Large_Path: string = GlobalConstants.serverUrl + GlobalConstants.product_pic_path;

    public static Prd_Img_780_Path: string = GlobalConstants.serverUrl + GlobalConstants.product_pic_path + 'thumb_780/';

    public static Prd_Img_200_Path: string = GlobalConstants.serverUrl + GlobalConstants.product_pic_path + 'thumbnail/';
    //+++++++++++++++++++++++++ PRODUCTS PICTURES PATH :: End +++++++++++++++++++++++++//
}