<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\SimAspirasi;
use App\Models\SimCaleg;
use App\Models\SimEvent;
use Gbuckingham89\YouTubeRSSParser\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Instagram\Api;
use Instagram\Storage\CacheManager;
use Spatie\MediaLibrary\MediaStream;
use Str;

class PageController extends Controller
{
    public function event()
    {
        $events = SimEvent::whereYear('start_date', date('Y'))->get();
        $monthEvents = SimEvent::whereMonth('start_date', date('m'))->take(4)->get();

        return view('front.event', compact('events', 'monthEvents'));
    }

    public function galeri()
    {
        $cache = new CacheManager(storage_path() . "/framework/cache/");
        $api = new Api($cache);
        $api->setUserName(Arr::last(explode('/', env('INSTAGRAM'))));
        $instagram = $api->getFeed()->getMedias();

        $parser = new Parser();
        $rss_url = 'https://www.youtube.com/feeds/videos.xml?channel_id=' . Arr::last(explode('/', env('YOUTUBE')));
        $youtube = $parser->loadUrl($rss_url);

        $videos = collect($youtube->videos)->sortByDesc('updated_at');
        $videosPaginate = $videos->splice(8);

        return view('front.galeri', compact('instagram', 'videos'));
    }

    public function help()
    {
        return view('front.help');
    }

    public function report(Request $request)
    {
        $keyword =$request->get('search', null);

        $reports = Report::when($keyword, function ($q) use ($keyword) {
            $q->where('name', 'like', "%{$keyword}%");
        })->paginate(10);

        return view('front.report', compact('reports'));
    }

    public function downloadReport(Report $report)
    {
        $filename = Str::slug($report->name) . '.zip';

        $download = $report->getMedia('report');

        return MediaStream::create($filename)->addMedia($download);
    }
}
