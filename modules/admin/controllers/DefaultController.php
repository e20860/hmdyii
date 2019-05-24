<?php

namespace app\modules\admin\controllers;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AdmController
{
    private $logFiles =[
        'svr-login' => ['file' => '@app/logs/access.log',
                        'parcer' => 'serverLoginData', ],
        'svr-error' => ['file' => '@app/logs/error.log',
                        'parcer' => 'serverErrorData', ],
        'app-error' => ['file' =>  '@app/runtime/logs/app.log',
                        'parcer' => 'appErrorData', ],
        'app-info' => ['file' =>  '@app/runtime/logs/info.log',
                       'parcer' => 'appInfoData',],
        'statistic' => ['file' =>  '@app/runtime/logs/info.log',
                       'parcer' => 'statData',],        
    ];
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->checkUser();
        return $this->render('index');
    }
    
    public function actionGetLog()
    {
        $logName = \Yii::$app->request->get('fname');
        $logFile = Url::to($this->logFiles[$logName]['file']);
        $parcer = $this->logFiles[$logName]['parcer'];
        $dataArrayContaner = $this->$parcer($logFile);
        $dataArray = $dataArrayContaner['data'];
        $attributes = $dataArrayContaner['attributes']; 
        $provider = new ArrayDataProvider([
            'allModels' => $dataArray,
            'pagination' => [
                'pageSize' => 50,
            ],
            'sort' => [
                'attributes' => $attributes,
            ],
        ]);
        $column1 = [ ['class' => 'yii\grid\SerialColumn'],];
        $columns = array_merge($column1,$attributes);
        
        return $this->renderAjax('view-log',[
            'provider' => $provider,
            'dataArray' => $dataArray,
            'columns' => $columns,
        ]);
    }
    
    protected function serverLoginData($fileName)
    {
       $lar = [];  // result array
       $pattern = '#([\d]+\.[\d]+\.[\d]+\.[\d]).+(\[.*\]).+("GET[^"]*").+#';

       if(!is_file($fileName)) {
               throw new NotFoundHttpException('Файл не обнаружен');
       }
       $fh = fopen($fileName, 'r');
       while(!feof($fh)){
               preg_match($pattern,fgets($fh),$matches);
               if(count($matches)>0){
                       $lar[] = [
                               'ip' => $matches[1],
                               'time' => $matches[2],
                               'resource' => $matches[3],
                       ];
               }
       }
       fclose($fh);
       $attributes = ['ip','time','resource'];
       return [
           'attributes' => $attributes,
           'data' => $lar,
           ];       
    }
    
    protected function serverErrorData($fileName)
    {
       $lar = [];  // result array
       $pattern = '#^(\[.*\])\s(\[.*\])\s(\[.*\])\s(\[.*\])\s(.*)$#U';

       if(!is_file($fileName)) {
               throw new NotFoundHttpException('Файл не обнаружен');
       }
       $fh = fopen($fileName, 'r');
       while(!feof($fh)){
               preg_match($pattern,fgets($fh),$matches);
               if(count($matches)>0){
                       $lar[] = [
                               'time' => $matches[1],
                               'type' => $matches[2],
                               'message' => $matches[5],
                       ];
               }
       }
       fclose($fh);
       $attributes = ['time','type','message'];
       return [
           'attributes' => $attributes,
           'data' => $lar,
           ];       
        
    }
    
    protected function appErrorData($fileName)
    {
       $lar = [];  // result array
       $pattern = '#^([0-9]{4}-[0-9]{2}-[0-9]{2}\s\d\d:\d\d:\d\d)(.*)$#iU';

       if(!is_file($fileName)) {
               throw new NotFoundHttpException('Файл не обнаружен');
       }
       $fh = fopen($fileName, 'r');
       while(!feof($fh)){
               preg_match($pattern,fgets($fh),$matches);
               if(count($matches)>0){
                       $lar[] = [
                            'time' => $matches[1],
                            'message' => $matches[2],
                       ];
               }
       }
       fclose($fh);
       $attributes = ['time','message'];
       return [
           'attributes' => $attributes,
           'data' => $lar,
           ];       
    }
    
    protected function appInfoData($fileName)
    {
       $lar = [];  // result array
       $pattern = '#^([0-9]{4}-[0-9]{2}-[0-9]{2}\s\d\d:\d\d:\d\d)\s*(\[\d+\.\d+\.\d+\.\d\]).*Просмотр изделия:(.*)$#iU';

       if(!is_file($fileName)) {
               throw new NotFoundHttpException('Файл не обнаружен');
       }
       $fh = fopen($fileName, 'r');
       while(!feof($fh)){
               preg_match($pattern,fgets($fh),$matches);
               if(count($matches)>0){
                       $lar[] = [
                            'time' => $matches[1],
                            'client' => $matches[2],
                            'item' => $matches[3],
                       ];
               }
       }
       fclose($fh);
       $attributes = ['time','client','item'];
       return [
           'attributes' => $attributes,
           'data' => $lar,
           ];       
    }
    
    protected function statData($fileName) {
       $lar = [];  // result array
       $pattern = '#^.*Просмотр изделия:(.*)$#iU';

       if(!is_file($fileName)) {
               throw new NotFoundHttpException('Файл не обнаружен');
       }
       $fh = fopen($fileName, 'r');
       while(!feof($fh)){
            preg_match($pattern,fgets($fh),$matches);
            if(count($matches)>0){
		$item = $matches[1];
                if (isset($lar[$item])) {
                    $lar[$item]['quantity'] ++;
                } else {
                    $lar[$item] = [
                        'item' => $item,
                        'quantity' => 1,
                    ];
                }
            }
        }
       fclose($fh);
       $attributes = ['item','quantity'];
       return [
           'attributes' => $attributes,
           'data' => $lar,
           ];               
    }
    
    
}
