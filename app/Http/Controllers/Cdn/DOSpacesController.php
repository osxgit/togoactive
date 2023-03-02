<?php

 class DoSpacesController extends Controller
{
    private $cdnService;

    public function __construct(CdnService $cdnService)
    {
        $this->cdnService = $cdnService;
    }

    public function store(DigitalOceanStoreRequest $request,$folder)
    {
        $file = $request->asFile('doctorProfileImageFile');
        $fileName = (string) Str::uuid();
//        $folder = config('filesystems.disks.do.folder');

        Storage::disk('do')->put(
            "{$folder}/{$fileName}",
            file_get_contents($file)
        );

        return response()->json(['message' => 'File uploaded'], 200);
    }
    public function delete(DigitalOceanDeleteRequest $request,$folder)
    {
        $fileName = $request->validated()['doctorProfileImageFileName'];
//        $folder = config('filesystems.disks.do.folder');

        Storage::disk('do')->delete("{$folder}/{$fileName}");
        $this->cdnService->purge($fileName);

        return response()->json(['message' => 'File deleted'], 200);
    }

    public function update(DigitalOceanUpdateRequest $request,$folder)
    {
        $file = $request->asFile('doctorProfileImageFile');
        $fileName = $request->validated()['doctorProfileImageFileName'];
//        $folder = config('filesystems.disks.do.folder');

        Storage::disk('do')->put(
            "{$folder}/{$fileName}",
            file_get_contents($file)
        );
        $this->cdnService->purge($fileName);

        return response()->json(['message' => 'File updated'], 200);
    }

    public function sign(DigitalOceanSignRequest $request,$folder)
    {
//        $folder = config('filesystems.disks.do.folder');
        $fileName = $request->validated()["doctorProfileImageFileName"];
        $filePath = $folder . '/' . $fileName;
        assert(env('FILESYSTEM_DRIVER') == 'do');

        return File::getSignedUri($filePath);
    }
}