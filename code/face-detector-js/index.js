const video = document.getElementById("video");

// Model
let TINY_FACE_DETECTOR = faceapi.nets.tinyFaceDetector.loadFromUri("/models");
let FACE_LANDMARK = faceapi.nets.faceLandmark68Net.loadFromUri("/models");
let FACE_RECOGNITION = faceapi.nets.faceRecognitionNet.loadFromUri("/models");
let FACE_EXPRESSION = faceapi.nets.faceExpressionNet.loadFromUri("/models");
let FACE_AGE_GENDER = faceapi.nets.ageGenderNet.loadFromUri("/models");

Promise.all([
  TINY_FACE_DETECTOR,
  FACE_LANDMARK,
  FACE_RECOGNITION,
  FACE_EXPRESSION,
  FACE_AGE_GENDER,
]).then(startDetect);

async function startDetect() {
  let constraints = (window.constraints = {
    audio: false,
    video: true,
  });

  const stream = await navigator.mediaDevices.getUserMedia(constraints);
  video.srcObject = stream;
}

video.addEventListener("play", () => {
  const canvas = document.createElement("canvas");
  let context = canvas.getContext("2d");

  document.body.append(canvas);
  const displaySize = {
    width: video.width,
    height: video.height,
  };
  faceapi.matchDimensions(canvas, displaySize);
  setInterval(async () => {
    const detection = await faceapi
      .detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
      .withFaceLandmarks()
      .withFaceExpressions()
      .withAgeAndGender();

    const resizedDetections = faceapi.resizeResults(detection, displaySize);

    //Clear Rectangle
    context.clearRect(0, 0, canvas.width, canvas.height);

    faceapi.draw.drawDetections(canvas, resizedDetections);
    faceapi.draw.drawFaceLandmarks(canvas, resizedDetections);
    faceapi.draw.drawFaceExpressions(canvas, resizedDetections);

    resizedDetections.forEach(({age, gender, detection}) => {
      const drawbox = new faceapi.draw.DrawBox(detection.box, {
        label: [
          `umur : ${faceapi.round(age, 0)}`,
          `Sex : ${gender === "male" ? "Laki-Laki" : "Perempuan"}`,
        ],
      });
      drawbox.draw(canvas);
    });
  }, 100);
});
