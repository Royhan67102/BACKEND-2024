// Import Student Controller
const StudentController = require("../controller/StudentController");

const express = require("express");
const router = express.Router();

router.get("/", (req, res) => {
  res.send("Hello Express");
});

router.get("/student", StudentController.index);
router.post("/student", StudentController.store);
router.put("/student/:id", StudentController.update);
router.delete("/student/:id", StudentController.destroy);

// Export router
module.exports = router;