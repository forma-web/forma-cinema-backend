<?php

namespace App\Jobs;

use FFMpeg\Coordinate\Dimension;
use FFMpeg\FFMpeg;
use FFMpeg\FFProbe;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ConvertVideo implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var \FFMpeg\FFMpeg
     */
    private readonly FFMpeg $ffmpeg;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private readonly string $file,
        private readonly array $needDimension,
    ) {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $input = storage_path('app/'.$this->file);

        $ffprobe = FFProbe::create();

        $dimensions = $ffprobe
            ->streams($input)
            ->videos()
            ->first()
            ->getDimensions();

        if (
            $this->needDimension['width'] > $dimensions->getWidth() ||
            $this->needDimension['height'] > $dimensions->getHeight()
        ) {
            return;
        }

        unset($ffprobe);

        $output = storage_path(
            'app/rendered/'.$this->needDimension['width'].'_'.Str::random(10).'.mp4'
        );

        $ffmpeg = FFMpeg::create([
            'ffmpeg.threads' => 4,
        ]);

        /** @var \FFMpeg\Media\Video $video */
        $video = $ffmpeg->open($input);

        $video
            ->filters()
            ->resize(new Dimension(
                $this->needDimension['width'],
                $this->needDimension['height'],
            ));

        $video->save(new X264(), $output);
    }
}
